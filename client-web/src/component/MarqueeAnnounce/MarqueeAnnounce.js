import { Col ,Image,Row, Space ,Avatar, Card} from 'antd';
const { Meta } = Card;

const MarqueeAnnounce = () => {
    return (
        <>
            <marquee>
                <Row>
                    <Space>
                        <Col xs={24} md={6}>
                            <Card
                                style={{ width: 300 }}
                                cover={
                                    <img
                                        alt="example"
                                        src="https://cdn.pixabay.com/photo/2016/04/16/00/05/piglet-1332259_1280.jpg"
                                    />
                                }
                            >
                                <Meta
                                    avatar={<Avatar src="https://xsgames.co/randomusers/avatar.php?g=pixel" />}
                                    title="Card title"
                                    description="This is the description"
                                />
                            </Card>
                        </Col>
                        <Col xs={24} md={6}>
                            <Card
                                style={{ width: 300 }}
                                cover={
                                    <img
                                        alt="example"
                                        src="https://cdn.pixabay.com/photo/2016/04/16/00/05/piglet-1332259_1280.jpg"
                                    />
                                }
                            >
                                <Meta
                                    avatar={<Avatar src="https://xsgames.co/randomusers/avatar.php?g=pixel" />}
                                    title="Card title"
                                    description="This is the description"
                                />
                            </Card>
                        </Col>
                        <Col xs={24} md={6}>
                            <Card
                                style={{ width: 300 }}
                                cover={
                                    <img
                                        alt="example"
                                        src="https://cdn.pixabay.com/photo/2016/04/16/00/05/piglet-1332259_1280.jpg"
                                    />
                                }
                            >
                                <Meta
                                    avatar={<Avatar src="https://xsgames.co/randomusers/avatar.php?g=pixel" />}
                                    title="Card title"
                                    description="This is the description"
                                />
                            </Card>
                        </Col>
                        <Col xs={24} md={6}>
                            <Card
                                style={{ width: 300 }}
                                cover={
                                    <img
                                        alt="example"
                                        src="https://cdn.pixabay.com/photo/2016/04/16/00/05/piglet-1332259_1280.jpg"
                                    />
                                }
                            >
                                <Meta
                                    avatar={<Avatar src="https://xsgames.co/randomusers/avatar.php?g=pixel" />}
                                    title="Card title"
                                    description="This is the description"
                                />
                            </Card>
                        </Col>
                    </Space>
                </Row>
            </marquee>
        </>
    )
}

export default MarqueeAnnounce
